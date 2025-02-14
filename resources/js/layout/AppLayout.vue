<script setup>
import { Box, Document } from "@element-plus/icons-vue";
import { useRouter } from "vue-router";

const router = useRouter();

const handleRedirect = (name) => {
    router.push({ name: name });
};
</script>

<template>
    <div class="common-layout">

    </div>
</template>
