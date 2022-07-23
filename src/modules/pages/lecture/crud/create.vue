<template>
    <form-create
        parent="system-lecture"
        slug="lecture"
        title="Fakultas"
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

                            <v-col cols="2">
                                <v-text-field
                                    label="Short"
                                    v-model="record.slug"
                                ></v-text-field>
                            </v-col>
                        </v-row>
                    </v-card-text>
                </v-card>
            </v-form>
        </template>
    </form-create>
</template>