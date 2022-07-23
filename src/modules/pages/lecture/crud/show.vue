<template>
    <form-show
        parent="system-faculty"
        param-key="faculty"
        slug="faculty"
        title="fakultas"
    >
        <template v-slot:toolbar="{ record, theme }">
            <moui-button
                :color="`${theme} darken-1`"
                icon="door_open"
                tooltip="Buka Prodi"
                @click="openStudies(record)"
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
                                    readonly
                                ></v-text-field>
                            </v-col>

                            <v-col cols="2">
                                <v-text-field
                                    label="Short"
                                    v-model="record.slug"
                                    readonly
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
        openStudies(record) {
            this.$router.push({ 
                name: 'system-study', 
                params: { 
                    faculty: record.id 
                } 
            });
        }
    }
}
</script>