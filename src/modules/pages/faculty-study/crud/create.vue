<template>
    <form-create
        parent="system-study"
        slug="study"
        title="Program Studi"
    >
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

                            <v-col cols="6">
                                <v-text-field
                                    label="Student Count"
                                    v-model="record.student_count"
                                ></v-text-field>
                            </v-col>

                            <v-col cols="6">
                                <v-text-field
                                    label="Lecture Ratio"
                                    v-model="record.lecture_ratio"
                                ></v-text-field>
                            </v-col>
                        </v-row>
                    </v-card-text>
                </v-card>
            </v-form>
        </template>
    </form-create>
</template>