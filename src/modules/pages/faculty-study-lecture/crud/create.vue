<template>
    <form-create
        parent="system-lecture"
        slug="lecture"
        title="Dosen"
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
                                ></v-text-field>
                            </v-col>

                            <v-col cols="6">
                                <v-text-field
                                    label="Fullname"
                                    v-model="record.name"
                                    hide-details
                                ></v-text-field>
                            </v-col>

                            <v-col cols="4">
                                <v-text-field
                                    label="Degree"
                                    v-model="record.degree_bc"
                                    hide-details
                                ></v-text-field>
                            </v-col>

                            <v-col cols="2">
                                <v-select
                                    :items="genders"
                                    label="Gender"
                                    v-model="record.gender"
                                ></v-select>
                            </v-col>

                            <v-col cols="6">
                                <v-text-field
                                    label="Born Place"
                                    v-model="record.born_place"
                                ></v-text-field>
                            </v-col>

                            <v-col cols="4">
                                <v-menu
                                    ref="born_menu"
                                    v-model="born_menu"
                                    :close-on-content-click="false"
                                    transition="scale-transition"
                                    offset-y
                                    min-width="auto"
                                >
                                    <template v-slot:activator="{ on, attrs }">
                                        <v-text-field
                                            label="Born Date"
                                            v-model="record.born_date"
                                            v-bind="attrs"
                                            v-on="on"
                                        ></v-text-field>
                                    </template>

                                    <v-date-picker
                                        v-model="record.born_date"
                                        :active-picker.sync="activePicker"
                                        max="2005-01-01"
                                        min="1950-01-01"
                                        @change="(date) => $refs.born_menu.save(date)"
                                    ></v-date-picker>
                                </v-menu>
                            </v-col>

                            <v-col cols="12">
                                <div class="overline orange--text">identifier</div>
                            </v-col>

                            <v-col cols="6">
                                <v-text-field
                                    label="NIDN/DIDK"
                                    v-model="record.slug"
                                ></v-text-field>
                            </v-col>

                            <v-col cols="6">
                                <v-text-field
                                    label="NIK/NIP"
                                    v-model="record.nik"
                                ></v-text-field>
                            </v-col>

                            <v-col cols="12">
                                <div class="overline orange--text">graduation</div>
                            </v-col>

                            <v-col cols="2">
                                <v-text-field
                                    label="Title"
                                    v-model="record.education_lv"
                                ></v-text-field>
                            </v-col>

                            <v-col cols="10">
                                <v-text-field
                                    label="Campus"
                                    v-model="record.education_cp"
                                ></v-text-field>
                            </v-col>

                            <v-col cols="12">
                                <div class="overline orange--text">position</div>
                            </v-col>

                            <v-col cols="12">
                                <v-text-field
                                    label="Name"
                                    v-model="record.position_id"
                                    hide-details
                                ></v-text-field>
                            </v-col>

                            <v-col cols="8">
                                <v-text-field
                                    label="SK Number"
                                    v-model="record.sk_number"
                                ></v-text-field>
                            </v-col>

                            <v-col cols="4">
                                <v-menu
                                    ref="position_menu"
                                    v-model="position_menu"
                                    :close-on-content-click="false"
                                    transition="scale-transition"
                                    offset-y
                                    min-width="auto"
                                >
                                    <template v-slot:activator="{ on, attrs }">
                                        <v-text-field
                                            label="SK TMT"
                                            v-model="record.sk_date"
                                            v-bind="attrs"
                                            v-on="on"
                                        ></v-text-field>
                                    </template>

                                    <v-date-picker
                                        v-model="record.sk_date"
                                        :active-picker.sync="activePicker"
                                        :max="(new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10)"
                                        min="1950-01-01"
                                        @change="(date) => $refs.position_menu.save(date)"
                                    ></v-date-picker>
                                </v-menu>
                            </v-col>

                            <v-col cols="12">
                                <div class="overline orange--text">scholarship</div>
                            </v-col>

                            <v-col cols="12">
                                <v-text-field
                                    label="Name"
                                    v-model="record.scholarship_id"
                                    hide-details
                                ></v-text-field>
                            </v-col>

                            <v-col cols="6">
                                <v-text-field
                                    label="Start"
                                    v-model="record.scholarship_st"
                                ></v-text-field>
                            </v-col>

                            <v-col cols="6">
                                <v-text-field
                                    label="Finish"
                                    v-model="record.scholarship_fn"
                                ></v-text-field>
                            </v-col>

                            <v-col cols="12">
                                <div class="overline orange--text">certificate</div>
                            </v-col>

                            <v-col cols="6">
                                <v-text-field
                                    label="Register Number"
                                    v-model="record.certi_regist"
                                    hide-details
                                ></v-text-field>
                            </v-col>

                            <v-col cols="6">
                                <v-text-field
                                    label="SK Number"
                                    v-model="record.certi_number"
                                    hide-details
                                ></v-text-field>
                            </v-col>

                            <v-col cols="4">
                                <v-menu
                                    ref="certi_menu"
                                    v-model="certi_menu"
                                    :close-on-content-click="false"
                                    transition="scale-transition"
                                    offset-y
                                    min-width="auto"
                                >
                                    <template v-slot:activator="{ on, attrs }">
                                        <v-text-field
                                            label="SK TMT"
                                            v-model="record.certi_tmt"
                                            v-bind="attrs"
                                            v-on="on"
                                        ></v-text-field>
                                    </template>

                                    <v-date-picker
                                        v-model="record.certi_tmt"
                                        :active-picker.sync="activePicker"
                                        :max="(new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10)"
                                        min="1950-01-01"
                                        @change="(date) => $refs.certi_menu.save(date)"
                                    ></v-date-picker>
                                </v-menu>
                            </v-col>

                            <v-col cols="12">
                                <div class="overline orange--text">other info</div>
                            </v-col>

                            <v-col cols="6">
                                <v-menu
                                    ref="functional_menu"
                                    v-model="functional_menu"
                                    :close-on-content-click="false"
                                    transition="scale-transition"
                                    offset-y
                                    min-width="auto"
                                >
                                    <template v-slot:activator="{ on, attrs }">
                                        <v-text-field
                                            label="Functional TMT"
                                            v-model="record.functional_date"
                                            v-bind="attrs"
                                            v-on="on"
                                        ></v-text-field>
                                    </template>

                                    <v-date-picker
                                        v-model="record.functional_date"
                                        :active-picker.sync="activePicker"
                                        :max="(new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10)"
                                        min="1950-01-01"
                                        @change="(date) => $refs.functional_menu.save(date)"
                                    ></v-date-picker>
                                </v-menu>
                            </v-col>

                            <v-col cols="6">
                                <v-menu
                                    ref="inffasing_menu"
                                    v-model="inffasing_menu"
                                    :close-on-content-click="false"
                                    transition="scale-transition"
                                    offset-y
                                    min-width="auto"
                                >
                                    <template v-slot:activator="{ on, attrs }">
                                        <v-text-field
                                            label="Inffasing TMT"
                                            v-model="record.inffasing_date"
                                            v-bind="attrs"
                                            v-on="on"
                                        ></v-text-field>
                                    </template>

                                    <v-date-picker
                                        v-model="record.inffasing_date"
                                        :active-picker.sync="activePicker"
                                        :max="(new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10)"
                                        min="1950-01-01"
                                        @change="(date) => $refs.inffasing_menu.save(date)"
                                    ></v-date-picker>
                                </v-menu>
                            </v-col>

                            <v-col cols="6">
                                <v-text-field
                                    label="Inffasing Section"
                                    v-model="record.inffasing_section"
                                ></v-text-field>
                            </v-col>
                        </v-row>
                    </v-card-text>
                </v-card>
            </v-form>
        </template>
    </form-create>
</template>

<script>
export default {
    data:() => ({
        activePicker: null,
        genders: ['L', 'P'],
        born_menu: false,
        position_menu: false,
        certi_menu: false,
        inffasing_menu: false,
        functional_date: false,
    }),

    watch: {
        born_menu (val) {
            val && setTimeout(() => (this.activePicker = 'YEAR'))
        },

        position_menu (val) {
            val && setTimeout(() => (this.activePicker = 'YEAR'))
        },

        certi_menu (val) {
            val && setTimeout(() => (this.activePicker = 'YEAR'))
        },

        inffasing_menu (val) {
            val && setTimeout(() => (this.activePicker = 'YEAR'))
        },

        functional_date (val) {
            val && setTimeout(() => (this.activePicker = 'YEAR'))
        },
    },
}
</script>