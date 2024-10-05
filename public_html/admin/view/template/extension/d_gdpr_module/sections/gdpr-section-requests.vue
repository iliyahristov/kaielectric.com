<template id="tag-gdpr-section-requests">
    <div>
        <div class="table-responsive super-puper-table">
            <table id="gdpr_requests_table" class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">{{$t('requests.column_id')}}</th>
                    <th scope="col">{{$t('requests.column_type')}}</th>
                    <th scope="col" class="text-center">{{$t('requests.column_customer_id')}}</th>
                    <th scope="col" class="text-center">{{$t('requests.column_confirmed')}}</th>
                    <th scope="col" class="text-center">{{$t('requests.column_date')}}</th>
                </tr>
                </thead>

                <tbody>
                <tr v-for="req, i in requests" v-if="total > 0">
                    <th>{{req.id}}</th>
                    <th class="text-center text-capitalize">{{req.request_type}}</th>
                    <th class="text-center"><a :href="req.link">{{req.email}}</a></th>
                    <th class="text-center">
                        <span>
                            <i v-if="req.confirmed" class="gdpr-request-status fa fa-check" aria-hidden="true"></i>
                            <i v-else class="gdpr-request-status fa fa-times" aria-hidden="true"></i>
                        </span>
                    </th>
                    <th class="text-center">{{req.request_date}}</th>
                </tr>
                <tr v-if="total === 0">
                    <th colspan="5" class="text-center no-cron-jobs">{{$t('requests.text_no_requests')}}</th>
                </tr>
                </tbody>
            </table>
        </div>
        <gdpr-pagination :total="total" :page="page" :limit="limit" @change="changePage"/>
    </div>
</template>