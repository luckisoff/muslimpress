<template>
    <ul class="list-group list-group-flush">
        <li class="list-group-item" v-for="category in categories" :key="category.id">
            <a :href="`${main_url}/${locale}/category/${category.id}?name=${category.name}`">{{category[locale]}}</a>
        </li>
        <li class="list-group-item" v-show="more">
            <a href="#" @click.prevent="fetchCategories">>> Load More</a>
        </li>
    </ul>
</template>

<script>
export default {
    data(){
        return ({
            categories: [],
            main_url: window.Laravel.baseUrl,
            baseUrl: `${window.Laravel.baseUrl}/api/v1/category`,
            locale: window.Laravel.locale,
            url: '',
            more: true,


        })
    },

    mounted(){
        this.fetchCategories();
    },

    methods:{
        fetchCategories(){
            if(this.categories.length){
                let category = _.last(this.categories)
                this.url = `${this.baseUrl}?cat_id=${category.id}`;
            }else {
                this.url = this.baseUrl;
            }

            axios.get(this.url).then(response => {
                
                let categories = response.data.data;

                if(categories.length){
                    categories.map(cat=>{
                        this.categories.push(cat)
                    })
                } else {
                    this.more = false;
                }

            })
        },
        
        emitCatClick(category){
            EventBus.$emit('category', category);
        }
    },

}
</script>