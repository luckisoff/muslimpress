<template>
    <div class="comments mb-2 mt-2">
        <div class="comment-form">
            <form action="#" @submit.prevent="createComment" method="post">
                <div class="form-group">
                    <textarea v-model="model" name="comment" id="" cols="30" rows="4" class="form-control"></textarea>
                    <button class="btn btn-primary btn-sm mt-2" style="width:100%">Comment</button>
                </div>
            </form>
        </div>
        <div class="comment-list">
            <div class="comment mb-2" v-for="comment in comments" :key="comment.id">
                <div class="user">
                    <div class="row">
                        <div class="col-sm-1">
                            <img :src="comment.user.image" :alt="comment.user.name" class="user-image">
                        </div>

                        <div class="col-sm-11">
                            <div class="comment">
                                <a @click.prevent="deleteComment(comment)" href="#" class="fa fa-times-circle" v-if="comment.user.is_me"></a>
                                <div class="user-name">{{comment.user.name}}</div>
                                <p>{{comment.comment}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props:['article'],
    data(){
        return ({
            comments:[],
            url: `${window.Laravel.baseUrl}/api/v1/news-article/comment`,
            csrfToken: window.Laravel.csrfToken,
            model:''
        })
    },

    mounted(){
        this.fetchComments();
    },

    methods:{
        fetchComments(){
            axios.get(`${this.url}/${this.article.id}`).then(response => {
                let res = response.data;

                if(res.status){
                    if(res.data.length){
                        res.data.map(comment => {
                            this.comments.push(comment)
                        })
                    }
                } else {
                    toastr.error(res.message);
                }
            })
        },

        createComment(e){
            let formData = new FormData();
            formData.append('comment', this.model);
            formData.append('_token', this.csrfToken);

            axios.post(`${this.url}/${this.article.id}`, formData).then( response => {
                let res = response.data
                if(res.status){
                    this.comments.unshift(res.data)
                    this.model = '';
                    toastr.success(res.message)
                }else{
                    console.log(res)
                    toastr.error(res.message)
                }
            })

        },

        deleteComment(comment){
            axios.get(`${this.url}/delete/${comment.id}`).then(response=>{
                let res = response.data;
                if(res.status){
                    this.comments = this.comments.filter(cmnt => cmnt.id != comment.id)
                }else{
                    toastr.error(res.message)
                }
            })
        },

    }
}
</script>