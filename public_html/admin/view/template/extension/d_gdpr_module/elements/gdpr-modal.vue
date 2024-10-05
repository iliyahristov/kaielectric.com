<template id="tag-gdpr-modal">
    <div class="modal fade security_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" v-html="title"></h4>
                </div>
                <div class="modal-body" v-html="content"></div>
            </div>
        </div>
    </div>
</template>