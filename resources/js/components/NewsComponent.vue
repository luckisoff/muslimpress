<template>
    <div class="row">
         <div class="col-md-12 loader text-center clearfix" v-show="loading">
            <span class="fa fa-spinner fa-pulse"></span>
        </div>

        <div class="col-md-12 loader text-center clearfix" v-if="!loading && !this.articles.length">
            <p>Nothing to show!</p>
        </div>

        <div class="col-md-12 mb-5" v-for="article in articles" :key="article.id">
            <div class="card">
                <div class="card-body">
                    <div class="card-title text-justify">
                        <h3>
                            <a :href="createUrl(article)">{{article.title}}</a>
                        </h3>
                    </div>

                    <a :href="createUrl(article)">
                        <img class="card-img-top" :src="article.image" :alt="article.title">
                    </a>
                    <p class="card-text text-justify mt-2">{{article.summary}}</p>
                </div>
                <div class="card-footer">
                    <like-component :article="article"></like-component>
                </div>
            </div>  
        </div>

        <div class="col-md-12" v-show="more">
            <div class="text-center">
                <a href="#" @click.prevent="loadMore"><span class="fa fa-spinner fa-pulse" v-show="loading"></span> Load More</a>
            </div>
        </div>    
    </div>
</template>

<script>
import VueGoodshare from "vue-goodshare";
export default {
    components: {
        VueGoodshare
    },
   data(){
       return {
           articles: [],
           article_url:`${window.Laravel.baseUrl}/api/v1/news-article/${window.Laravel.type}`,
           url:'',
           loading: false,
           more: true,
           cat_name: window.Laravel.cat_name,
           cat_id: window.Laravel.cat_id
       }
   },

   mounted(){
       if(this.cat_id){
           this.article_url = `${this.article_url}/${this.cat_id}`
       }

       this.fetchArticles();
   },


   methods:{

       fetchArticles(last_id = null){

           if(last_id){
               this.url =`${this.article_url}?last_id=${last_id}`;
           } else {
               this.url = this.article_url;
           }

            axios.get(this.url).then(response => {

               let responseData = response.data.data;

               if(responseData.length){
                  responseData.map(article => {
                       this.articles.push(article)
                   })

               }else{
                   this.more = false;
               }

               console.log(this.articles.length)
               this.loading = false;

           }).catch(error => {
               this.loading = false;
               console.log('error', error)
           })
       },

       loadMore(){
           if(this.articles.length){
                this.loading = !this.loading;
                let article = _.last(this.articles);
                this.fetchArticles(article.id);
           }
       },

       createUrl(article = null, type = 'detail'){

           let url = ''

           if(type == 'detail' && article != null){
                 url = `${window.Laravel.baseUrl}/${window.Laravel.locale}/detail/${article.id}/${article.slug}`;
           }

           return url;
       },

       createShare(article, type = 'fb'){
           var url = this.createUrl(article);
           if(type == 'fb'){
               $('head').append(`<meta property="og:url" content="${url}"/>`);
               $('head').append(`<meta property="og:image" content="${article.image}" />`);
               $('head').append(`<meta property="og:title" content="${article.title}" />`);
               $('head').append(`<meta property="og:description" content="${article.summary}" />`);
           }else if(type == 'tw'){

           }

           return url;
       }
   }
}
</script>