<template id="tag-gdpr-section-todo">
    <div class="sm-todo-wrapper">
        <div class="sm-todo-element" :class="{active: todo.active}" v-for="todo, key in todos" @click="clickTodo(key, todo.active)">
            <span class="sm-todo-element-status"><i class="fas fa-check-circle"></i></span>
            <a class="sm-todo-element-action" target="_blank" :href="todo.link"><i class="fal fa-arrow-circle-right"></i></a>
            <div class="sm-todo-title">{{todo.title}}</div>
            <div class="sm-todo-description"v-html="todo.description"></div>
        </div>
    </div>
</template>