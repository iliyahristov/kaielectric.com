<template id="tag-gdpr-section-tables">
    <div class="row">
        <div class="col-md-4 col-lg-3">
            <ul class="nav nav-pills nav-stacked">
                <li class="active">
                    <a href="#tab_gdpr_todo" data-toggle="tab" aria-expanded="false">
                        <i class="far fa-clipboard-list" aria-hidden="true"></i>
                        {{$t('tables.tab_gdpr_todo')}}
                    </a>
                </li>
                <li>
                    <a href="#tab_gdpr_requests" data-toggle="tab" aria-expanded="false">
                        <i class="far fa-file-download" aria-hidden="true"></i>
                        {{$t('tables.tab_gdpr_request')}}
                    </a>
                </li>
                <li>
                    <a href="#tab_gdpr_cookies" data-toggle="tab" aria-expanded="false">
                        <i class="far fa-cookie-bite" aria-hidden="true"></i>
                        {{$t('tables.tab_gdpr_cookie')}}
                    </a>
                </li>
                <li>
                    <a href="#tab_gdpr_policy" data-toggle="tab" aria-expanded="false">
                        <i class="fal fa-file-check" aria-hidden="true"></i>
                        {{$t('tables.tab_gdpr_policies')}}
                    </a>
                </li>
                <li>
                    <a href="#tab_gdpr_notification" data-toggle="tab" aria-expanded="false">
                        <i class="far fa-exclamation-triangle" aria-hidden="true"></i>
                        {{$t('tables.tab_gdpr_notification')}}
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-md-8 col-lg-9">
            <div class="tab-content">
                <div id="tab_gdpr_todo" class="tab-pane active">
                    <gdpr-section-todo></gdpr-section-todo>
                </div>
                <div id="tab_gdpr_requests" class="tab-pane">
                    <gdpr-section-requests></gdpr-section-requests>
                </div>
                <div id="tab_gdpr_cookies" class="tab-pane">
                    <gdpr-section-cookies></gdpr-section-cookies>
                </div>
                <div id="tab_gdpr_policy" class="tab-pane">
                    <gdpr-section-policies></gdpr-section-policies>
                </div>
                <div id="tab_gdpr_notification" class="tab-pane">
                    <gdpr-section-notification></gdpr-section-notification>
                </div>
            </div>
        </div>
    </div>
</template>