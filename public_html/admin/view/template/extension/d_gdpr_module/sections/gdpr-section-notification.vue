<template id="tag-gdpr-section-notification">
    <div>
        <div class="page-header"><h3>{{$t('tables.tab_gdpr_notification')}}</h3></div>
        <div class="sm-todo-wrapper">
            <a class="btn protection_button" :href="$o('common.notification_url')" target="_blank">
                <i aria-hidden="true" class="fa fa-bell"></i>
                {{$t('common.button_notification')}} </a>
            <p class="sm-help-description">{{$t('common.text_notification')}}</p>
        </div>
    </div>
</template>