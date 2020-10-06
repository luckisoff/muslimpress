<template>
    <div class="row">
        <div class="col-4"><span class="fa color-orange" :class="{'fa-comment':article.is_commented, 'fa-comment-o':!article.is_commented}"></span> {{article.comments_count}}</div>
        <div class="col-4">
            <a href="#" @click.prevent="likeReact">
                <span class="fa color-orange" :class="{'fa-heart':article.is_liked, 'fa-heart-o':!article.is_liked}"></span> 
            </a>
            {{article.likes_count}}
        </div>
        <div class="col-4"><span class="fa fa-eye color-orange"></span> {{article.views_count}}</div>
    </div>
</template>

<script>
export default {
    props:['article'],
    data(){
        return {
            url: `${window.Laravel.baseUrl}/api/v1/news-article/react`
        }
    },

    methods:{
        likeReact(){
            axios(`${this.url}/${this.article.id}`).then(response=>{
                let res = response.data
                console.log(res)
                if(res.status){
                    this.article.is_liked = !this.article.is_liked
                    this.article.likes_count = parseInt(res.data.count)
                    toastr.success(res.message);
                } else {
                    toastr.error(res.message)
                }
            })
        }
    }
}
</script>