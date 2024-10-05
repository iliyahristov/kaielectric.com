<template id="tag-gdpr-module">
    <div>
        <div class="page-header">
            <div class="container-fluid">
                <div class="form-inline pull-right">
                    <button data-toggle="tooltip" :title="$t('common.button_save_and_stay')" class="btn btn-success" @click="saveAndStay" v-if="setup"><i
                            class="fa fa-save"></i></button>
                    <button data-toggle="tooltip" :title="$t('common.button_save')" class="btn btn-primary" @click="save" v-if="setup"><i
                            class="fa fa-save"></i></button>
                    <a :href="$o('common.cancel_url')" data-toggle="tooltip" :title="$t('common.button_cancel')"
                       class="btn btn-default" id="cancel-button"><i class="fa fa-reply"></i></a>
                </div>
                <h1>{{$t('common.heading_title')}} {{$o('common.version')}}</h1>
                <gdpr-breadcrumbs></gdpr-breadcrumbs>
            </div>
        </div>
        <div class="container-fluid">
            <div class="panel panel-default" :class="{security_panel: setup, panel_top_radius: setup}">
                <div class="panel-heading">
                    <h3 class="panel-title" style="width: 100%;">
                        <i class="fa fa-pencil"></i> {{$t('common.text_edit')}}
                        <span class="pull-right small_loader" v-if="setup"><i class="fa fa-refresh fa-fw protected" :class="{'fa-spin': loading}"></i></span>
                    </h3>
                </div>
                <div class="panel-body">
                    <gdpr-navigation v-if="setup"></gdpr-navigation>
                    <hr v-if="setup"/>
                    <router-view></router-view>
                    <gdpr-powered v-if="setup"></gdpr-powered>
                </div>
            </div>
        </div>
    </div>
</template>