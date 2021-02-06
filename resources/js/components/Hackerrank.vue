<template>
  <h1>jitu</h1>
</template><template>
  <div v-if="status==='true'">

    <h5 class="text-uppercase mb-3" style="font-weight: bold">  Feed back</h5>
              <div class="form-group">
                <textarea class="form-control" placeholder="Your message" rows="7" v-model="message"></textarea>
              </div>

      <h5 class="text-uppercase mb-3" style="font-weight: bold">RATE  </h5>

  <div class="rating">
    <ul class="list">
      <li @click="rate(star)" v-for="star in maxStars" :class="{ 'active': star <= stars }" :key="star.stars" class="star">
      <i :class="star <= stars ? 'fas fa-star' : 'far fa-star'"></i> 
      </li>
    </ul>
    <div v-if="hasCounter" class="info counter">
    
      
    </div>
  </div>

  <button class="btn btn-success mt-2" @click='send'>send</button>
</div>
</template>
<script>

export default {
  name: 'HRating',
  props: ['grade','report_id','hacker_id','user_id'],
  data() {
    return {
      stars: this.grade,
      hasCounter:true,
      maxStars:5,
      message:'',
       example:'',
      status:'true',
     

    }
  },


  created: function(){
        this.check()
    },
  methods: {
    rate(star) {
      if (typeof star === 'number' && star <= this.maxStars && star >= 0) {
        this.stars = this.stars === star ? star - 1 : star
      }
    },

      check()
      {

        axios.post('http://localhost/udemy/collage/hackerforme/public/business/rate/check',{

          'report_id':this.report_id
        }) 


         .then(response=>
         {  

            this.status=response.data;
         })
       
      },

    send(){
          axios.post('http://localhost/udemy/collage/hackerforme/public/business/rate', {
                   report_id: this.report_id,
                   hacker_id: this.hacker_id,
                   user_id: this.user_id,
                   stars:this.stars,
                   message:this.message
                 })
           .then(function (response) {
              console.log(response);
               })
         .catch(function (error) {
                console.log(error);



        });


        
       this.message='';
        
    this.$swal({
          title: 'Thank YOu!',
          text: 'We received Your feedback and rating ',
          icon: 'success',
          confirmButtonText: 'done'
     })
       this.status="false";
     
    }
  },
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">

  @import '../styles/rating.scss';
</style>