<template>
    <GuestLayout>
    
          
    <section class=" flex md:flex-row m-2 p-2 ">
      <div class="w-8/12">
   <h2>{{ post.title }}</h2>
   Post Details
   </div>
   <div class="w-4/12 p-4">
    <div class="m-2 p-2 bg-slate-500 text-white">
      <h2>Lastest Commmunities</h2>
    </div>
   </div>
    
    
    </section>
  </GuestLayout>
    
    </template>
    
    <script setup>
      import GuestLayout from "@/Layouts/GuestLayout.vue";
    import PostCard from "@/Components/PostCard.vue";
    import { Link } from "@inertiajs/vue3";
    import Pagination from "@/Components/Pagination.vue";
    // import CommunityList from "@/Components/CommunityList.vue"
    defineProps({
        community: Object,
        post: Object, 
        communities: Object
    });
    </script>