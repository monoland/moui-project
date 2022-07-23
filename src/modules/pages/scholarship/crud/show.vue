<template>
    <form-show
        parent="system-scholarship"
        param-key="scholarship"
        slug="scholarship"
        title="beasiswa"
        disable-edit
    >
        <template v-slot:toolbar="{ record, store, theme }">
            <moui-button
                :color="`${theme} darken-1`"
                icon="lock_reset"
                tooltip="Reset Password"
                @click="resetPassword(record, store)"
            ></moui-button>
        </template>

        <template v-slot:default="{ record }">
            <v-form ref="form">
                <v-card flat rounded="lg">
                    <v-card-text class="pb-0">
                        <v-row dense>
                            <v-col cols="12">
                                <v-text-field
                                    label="Name"
                                    v-model="record.name"
                                ></v-text-field>
                            </v-col>

                            <v-col cols="12">
                                <v-text-field
                                    label="NIND/Email"
                                    v-model="record.email"
                                ></v-text-field>
                            </v-col>
                        </v-row>
                    </v-card-text>
                </v-card>
            </v-form>
        </template>
    </form-show>
</template>

<script>
export default {
    methods: {
        resetPassword(record, store) {
            store.$http(store.dataURL + `/${record.id}/reset`, {
                method: 'POST',
                params: record
            })
            .then(() => {
                store.$snackbar({
                    color: 'success',
                    text: 'Reset katasandi berhasil.'
                });

                this.$router.push({ 
                    name: 'system-user', 
                    params: this.$route.params 
                });
            })
            .catch((e) => {
                store.recordErrorHandler(e);
            })
        }
    }
}
</script>