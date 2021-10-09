<template>
    <div>
        <h1>{{ page.post_title }}</h1>
        <div v-html="page.post_content"></div>
    </div>
</template>

<script>
export default {
    name: "Index",
    props: ['page']
}
</script>
