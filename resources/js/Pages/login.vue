<script setup>
    import vue from '@inertiajs/vue3';
    import useForm from '@inertiajs/vue3';
    import Link from '@inertiajs/vue3';
    import axios from 'axios';

    const form = useForm([
        username: '',
        password: ''
    ]);
    
</script>
<template>
    <form @prevent.submit="form.post('')">
        <label>username</label>
        <input type="text" v-model="form.user"><br>
        <label>password</label>
        <input type="password" v-model="form.password">
        <Link href=""> </Link>
    </form>
</template>