<template id="tag-gdpr-section-policies">
    <div>
        <div class="table-responsive super-puper-table">
            <table id="gdpr_requests_table" class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">{{$t('policies.column_id')}}</th>
                    <th scope="col" class="text-center">{{$t('policies.column_customer_email')}}</th>
                    <th scope="col" class="text-center">{{$t('policies.column_policy_id')}}</th>
                    <th scope="col" class="text-center">{{$t('policies.column_policy_name')}}</th>
                    <th scope="col" class="text-center">{{$t('policies.column_policy_content')}}</th>
                    <th scope="col" class="text-center">{{$t('policies.column_accepted_date')}}</th>
                    <th scope="col" class="text-center">{{$t('policies.column_view')}}</th>
                </tr>
                </thead>
                <tbody>
                <tr v-if="total > 0" v-for="policy, i in policies">
                    <th>{{policy.id}}</th>
                    <th class="text-center">
                        <a :href="policy.link" v-if="policy.customer_id">{{policy.email}}</a>
                        <span v-if="!policy.customer_id">{{policy.email}}</span>
                    </th>
                    <th class="text-center">{{policy.policy_id}}</th>
                    <th class="text-center">{{policy.name}}</th>
                    <th class="text-center">{{policy.short_content}}</th>
                    <th class="text-center">{{policy.date}}</th>
                    <th class="text-center"><a class="btn protection_button" @click="showPolicy(policy.id)"><i
                            aria-hidden="true" class="fa fa-eye"></i> {{$t('policies.text_view')}}</a></th>
                </tr>

                <tr v-if="total === 0">
                    <th colspan="7" class="text-center no-cron-jobs">{{$t('policies.text_no_policies')}}</th>
                </tr>
                </tbody>
            </table>
            <gdpr-modal v-if="modal_status" :title="activePolicy.name" :content="activePolicy.content"
                        @close="closeModal"/>
        </div>
        <gdpr-pagination :total="total" :page="page" :limit="limit" @change="changePage"/>
    </div>
</template>
