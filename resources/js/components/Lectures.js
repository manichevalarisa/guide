import Vue from 'vue';

window.ax = require('axios');
window.ax.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let Lectures = null;

if (document.getElementById('vue-lectures')) {
    Lectures = new Vue({
        el: '#vue-lectures',
        components: {

        },
        data: {
            showElement: 'lecture',
            currentTab: 'retouch',
        },
        created() {
            console.log(this.showElement);
        },
        methods: {
            saveAction(action, lecture) {
                console.log(action);
                ax.get('/lecture-action/' + lecture + '/' + action).then(response => {
                    console.log(response);
                    this.changeProgress(response.data.progress);
                }).catch(e => {
                    console.log(e);
                })
            },
            changeProgress(progress){
                let btn = document.getElementById('progress-bar-value');
                btn.value = progress;
                btn.click();
            },
            changeTab(tab) {
                this.currentTab = tab;
            }
        }
    });
}
export {Lectures};

