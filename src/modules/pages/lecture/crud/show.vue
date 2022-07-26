<template>
    <form-show
        parent="system-lecture"
        param-key="lecture"
        slug="lecture"
        title="dosen"
    >
        <template v-slot:default="{ record }">
            <v-form ref="form">
                <v-card flat rounded="lg">
                    <v-card-text class="pb-0">
                        <v-row dense>
                            <v-col cols="2">
                                <v-text-field
                                    label="Degree"
                                    v-model="record.degree_fr"
                                    hide-details
                                    readonly
                                ></v-text-field>
                            </v-col>

                            <v-col cols="6">
                                <v-text-field
                                    label="Fullname"
                                    v-model="record.name"
                                    hide-details
                                    readonly
                                ></v-text-field>
                            </v-col>

                            <v-col cols="4">
                                <v-text-field
                                    label="Degree"
                                    v-model="record.degree_bc"
                                    hide-details
                                    readonly
                                ></v-text-field>
                            </v-col>

                            <v-col cols="2">
                                <v-text-field
                                    label="Gender"
                                    v-model="record.gender"
                                    hide-details
                                    readonly
                                ></v-text-field>
                            </v-col>

                            <v-col cols="6">
                                <v-text-field
                                    label="Born Place"
                                    v-model="record.born_place"
                                    readonly
                                ></v-text-field>
                            </v-col>

                            <v-col cols="4">
                                <v-text-field
                                    label="Born Date"
                                    v-model="record.born_date"
                                    readonly
                                ></v-text-field>
                            </v-col>

                            <v-col cols="12">
                                <div class="overline orange--text">identifier</div>
                            </v-col>

                            <v-col cols="6">
                                <v-text-field
                                    label="NIDN/DIDK"
                                    v-model="record.nidn"
                                    readonly
                                ></v-text-field>
                            </v-col>

                            <v-col cols="6">
                                <v-text-field
                                    label="NIK/NIP"
                                    v-model="record.nik"
                                    readonly
                                ></v-text-field>
                            </v-col>

                            <v-col cols="12">
                                <div class="overline orange--text">graduation</div>
                            </v-col>

                            <v-col cols="2">
                                <v-text-field
                                    label="Title"
                                    v-model="record.education_lv"
                                    readonly
                                ></v-text-field>
                            </v-col>

                            <v-col cols="10">
                                <v-text-field
                                    label="Campus"
                                    v-model="record.university_name"
                                    readonly
                                ></v-text-field>
                            </v-col>

                            <v-col cols="12">
                                <div class="overline orange--text">position</div>
                            </v-col>

                            <v-col cols="12">
                                <v-text-field
                                    label="Name"
                                    v-model="record.position_name"
                                    hide-details
                                    readonly
                                ></v-text-field>
                            </v-col>

                            <v-col cols="8">
                                <v-text-field
                                    label="SK Number"
                                    v-model="record.sk_number"
                                    readonly
                                ></v-text-field>
                            </v-col>

                            <v-col cols="4">
                                <v-text-field
                                    label="SK TMT"
                                    v-model="record.sk_date"
                                    readonly
                                ></v-text-field>
                            </v-col>

                            <v-col cols="12">
                                <div class="overline orange--text">scholarship</div>
                            </v-col>

                            <v-col cols="12">
                                <v-text-field
                                    label="Name"
                                    v-model="record.scholarship_id"
                                    hide-details
                                    readonly
                                ></v-text-field>
                            </v-col>

                            <v-col cols="6">
                                <v-text-field
                                    label="Start"
                                    v-model="record.scholarship_st"
                                    readonly
                                ></v-text-field>
                            </v-col>

                            <v-col cols="6">
                                <v-text-field
                                    label="Finish"
                                    v-model="record.scholarship_fn"
                                    readonly
                                ></v-text-field>
                            </v-col>

                            <v-col cols="12">
                                <div class="overline orange--text">certificate</div>
                            </v-col>

                            <v-col cols="12">
                                <v-text-field
                                    label="Register Number"
                                    v-model="record.certi_regist"
                                    hide-details
                                    readonly
                                ></v-text-field>
                            </v-col>

                            <v-col cols="8">
                                <v-text-field
                                    label="SK Number"
                                    v-model="record.certi_number"
                                    hide-details
                                    readonly
                                ></v-text-field>
                            </v-col>

                            <v-col cols="4">
                                <v-text-field
                                    label="SK TMT"
                                    v-model="record.certi_tmt"
                                    readonly
                                ></v-text-field>
                            </v-col>

                            <v-col cols="12">
                                <div class="overline orange--text">other info</div>
                            </v-col>

                            <v-col cols="6">
                                <v-text-field
                                    label="Functional TMT"
                                    v-model="record.functional_date"
                                    readonly
                                ></v-text-field>
                            </v-col>

                            <v-col cols="6">
                                <v-text-field
                                    label="Inffasing TMT"
                                    v-model="record.inffasing_date"
                                    readonly
                                ></v-text-field>
                            </v-col>

                            <v-col cols="6">
                                <v-text-field
                                    label="Inffasing Section"
                                    v-model="record.inffasing_section"
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
        // 
    }
}
</script>