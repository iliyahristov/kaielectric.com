<template id="tag-gdpr-pagination">
    <div class="pagination-wrapper">
        <ul class="pagination" v-if="totalPages > 1">
            <li v-for="value in pages" :class="{active: value.active}"><a @click="clickPage(value.number)">{{value.number}}</a></li>
        </ul>
        <div class="pagination-title">{{$t('common.text_showing')}} {{currentStart}} {{$t('common.text_to')}} {{currentEnd}} {{$t('common.text_of')}} {{total}} ({{totalPages}} {{$t('common.text_pages')}})</div>
    </div>
</template>