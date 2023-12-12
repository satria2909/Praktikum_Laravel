import AppForm from '../app-components/Form/AppForm';

Vue.component('mahasiswa-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nim:  '' ,
                nama:  '' ,
                gambar:  '' ,
                umur:  '' ,
                alamat:  '' ,
                email:  '' ,
                
            }
        }
    }

});