<template id="tag-gdpr-welcome">
    <div class="welcome">
        <div class="welcome-into">
            <div class="welcome-into-logo"><img src="view/image/d_gdpr_module/logo.svg" /></div>
            <div class="welcome-into-heading">{{$t('common.text_welcome_heading_title')}}</div>
            <div class="welcome-into-text">{{$t('common.text_welcome_heading_text')}}</div>

            <div class="welcome-into-start">
                <a class="btn btn-primary btn-lg setup" @click="setup">{{$t('common.button_setup')}}</a>
            </div>
        </div>
        <div class="welcome-features">
            <div class="row">
                <div class="col-md-3">
                    <div class="welcome-features-icon"><img src="view/image/d_gdpr_module/icons/icon1.svg" /></div>
                    <div class="welcome-features-text" v-html="$t('common.text_welcome_icon_1_text')"></div>
                </div>
                <div class="col-md-3">
                    <div class="welcome-features-icon"><img src="view/image/d_gdpr_module/icons/icon2.svg" /></div>
                    <div class="welcome-features-text" v-html="$t('common.text_welcome_icon_2_text')"></div>
                </div>
                <div class="col-md-3">
                    <div class="welcome-features-icon"><img src="view/image/d_gdpr_module/icons/icon3.svg" /></div>
                    <div class="welcome-features-text" v-html="$t('common.text_welcome_icon_3_text')"></div>
                </div>
                <div class="col-md-3">
                    <div class="welcome-features-icon"><img src="view/image/d_gdpr_module/icons/icon4.svg" /></div>
                    <div class="welcome-features-text" v-html="$t('common.text_welcome_icon_4_text')"></div>
                </div>
            </div>
        </div>
    </div>
</template>