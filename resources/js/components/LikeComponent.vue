<template>
    <div class="row">
        <div class="col-4"><span class="fa fa-comment-o color-orange"></span> {{article.comments_count}}</div>
        <div class="col-4"><span class="fa fa-heart-o color-orange"></span> {{article.likes_count}}</div>
        <div class="col-4"><span class="fa fa-eye color-orange"></span> {{article.views_count}}</div>
    </div>
</template>

<script>
export default {
    props:['article'],
    mounted(){
        console.log(this.article)
    }
}
</script>