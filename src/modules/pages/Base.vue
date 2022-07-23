<template>
    <page-base>
        <template v-slot:drawer>
            <v-list-item :to="{ name: 'system-dashboard' }">
                <v-list-item-icon>
                    <v-icon>dashboard</v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                    <v-list-item-title>Beranda</v-list-item-title>
                </v-list-item-content>
            </v-list-item>

            <v-list-item :to="{ name: 'system-recap' }">
                <v-list-item-icon>
                    <v-icon>print</v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                    <v-list-item-title>Laporan</v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </template>

    </page-base>
</template>