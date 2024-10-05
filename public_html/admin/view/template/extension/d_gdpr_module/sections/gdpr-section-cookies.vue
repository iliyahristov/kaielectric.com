<template id="tag-gdpr-section-cookies">
    <div>
        <div class="table-responsive super-puper-table">
            <table id="gdpr_requests_table" class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">{{$t('cookies.column_id')}}</th>
                    <th scope="col">{{$t('cookies.column_user_agent')}}</th>
                    <th scope="col" class="text-center">{{$t('cookies.column_customer_id')}}</th>
                    <th scope="col" class="text-center">{{$t('cookies.column_accept_language')}}</th>
                    <th scope="col" class="text-center">{{$t('cookies.column_cookie_extra')}}</th>
                    <th scope="col" class="text-center">{{$t('cookies.column_accepted_date')}}</th>
                </tr>
                </thead>

                <tbody>
                <tr v-if="total > 0" v-for="cookie, i in cookies">
                    <th>{{cookie.id}}</th>
                    <th class="text-center">{{cookie.user_agent}}</th>
                    <th class="text-center"><a :href="cookie.link">{{cookie.email}}</a></th>
                    <th class="text-center">{{cookie.accept_language_id}}</th>
                    <th class="text-center">{{cookie.cookie_extra}}</th>
                    <th class="text-center">{{cookie.accept_date}}</th>
                </tr>

                <tr v-if="total === 0">
                    <th colspan="6" class="text-center no-cron-jobs">{{$t('cookies.text_no_cookies')}}</th>
                </tr>

                </tbody>

            </table>
        </div>
        <gdpr-pagination :total="total" :page="page" :limit="limit" @change="changePage"/>
    </div>
</template>