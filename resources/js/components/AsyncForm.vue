<template>
    <div class="row">
        <div class="col">
            <form>
                <div class="form-group">
                    <label class="">Введите ИНН</label>
                    <input :class="{ 'is-invalid': innError }" v-model="inn" type="text" class="form-control" required :disabled="state==='process'">
                    <small class="form-text text-muted">
                        Инн физического лица, 10 или 12 цифр, см.
                        <a target='_blank' href='http://www.consultant.ru/cons/cgi/online.cgi?req=doc&base=LAW&n=134082&dst=1000000001#00009710269741562971'>Приказ от 29 июня 2012 г. n ммв-7-6/435</a>
                    </small>
                    <div v-if="innError" class="invalid-feedback">
                        {{innError}}
                    </div>
                </div>

                <div v-if="result.state === 'success'">
                    <div v-if="result.status && result.status !== null && result.status" class="alert alert-success">
                        {{result.message}}
                    </div>

                    <div v-if="result.status && result.status !== null && !result.status" class="alert alert-danger">
                        {{result.message}}
                    </div>
                </div>



                <button @click.prevent.stop="check" type="submit" class="btn btn-primary">Проверить</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                state: null,
                inn: null,
                errors: {},
                result: {},
                timeoutId: null
            }
        },
        computed: {
            innError() {
                return this.errors.inn && this.errors.inn[0] ? this.errors.inn[0] : false
            }
        },
        methods: {
            check() {
                this.result = {};
                this.errors = {};

                axios.post('/api/inn',  {
                    inn: this.inn
                }).then(response => {
                    this.state = response.data.state;
                    this.result = response.data.result;
                    if(this.state === 'process') {
                        this.timeoutId = setTimeout(this.check.bind(this), 1000)
                    }
                }).catch(error => {
                    this.state = 'errors';
                    this.errors = error.response.data.errors;
                });
                return false;
            }
        }
    }
</script>
