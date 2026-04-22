<template>
    <div>
        <main>
            <router-view> </router-view>
        </main>
    </div>
</template>

<script setup></script>

<style scoped>
header {
    padding: 1rem;
    background: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
}
nav a {
    margin-right: 1rem;
    font-weight: bold;
    color: #333;
    text-decoration: none;
}
nav a.router-link-active {
    color: #007bff;
}
main {
    padding: 2rem;
}
</style>
