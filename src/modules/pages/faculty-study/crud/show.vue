<template>
    <form-show
        parent="system-study"
        parent-key="faculty"
        param-key="study"
        slug="study"
        title="Program Studi"
    >
        <template v-slot:toolbar="{ record, theme }">
            <moui-button
                :color="`${theme} darken-1`"
                icon="history_edu"
                tooltip="Buka Dosen"
                @click="openLecture(record)"
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

                            <v-col cols="6">
                                <v-text-field
                                    label="Student Count"
                                    v-model="record.student_count"
                                    readonly
                                ></v-text-field>
                            </v-col>

                            <v-col cols="6">
                                <v-text-field
                                    label="Lecture Ratio"
                                    v-model="record.lecture_ratio"
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
        openLecture(record) {
            this.$router.push({ 
                name: 'system-study-lecture', 
                params: { 
                    faculty: this.$route.params.faculty,
                    study: record.id 
                } 
            });
        }
    }
}
</script>