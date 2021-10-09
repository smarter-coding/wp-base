<template>
    <div>
        <div v-for="post in posts">
            <p>{{ post.post_title }}</p>
        </div>
    </div>
</template>

<script>
export default {
    name: "Index",
    props: ['posts']
}
</script>
