<template>
    <page-home
        @initialized="fetchDashboardInfo"
    >
        <template v-slot:dockbar>
            <moui-dockbar>
                <v-col cols="1">
                    <moui-dockbar-item
                        icon="room_preferences"
                        label="Fakultas"
                        @click="openFaculty"
                    ></moui-dockbar-item>
                </v-col>

                <v-col cols="1">
                    <moui-dockbar-item
                        icon="chair"
                        label="Jabatan"
                        @click="openPosition"
                    ></moui-dockbar-item>
                </v-col>

                <v-col cols="1">
                    <moui-dockbar-item
                        icon="spa"
                        label="Beasiswa"
                        @click="openScholarship"
                    ></moui-dockbar-item>
                </v-col>

                <v-col cols="1">
                    <moui-dockbar-item
                        icon="history_edu"
                        label="Dosen"
                        @click="openLecture"
                    ></moui-dockbar-item>
                </v-col>

                <v-col cols="1">
                    <moui-dockbar-item
                        icon="admin_panel_settings"
                        label="Pengguna"
                        @click="openUser"
                    ></moui-dockbar-item>
                </v-col>
            </moui-dockbar>
        </template>

        <template v-slot:default="{ theme }">
            <v-row >
                <v-col cols="2">
                    <v-card rounded="lg" flat class="d-flex overflow-hidden">
                        <v-avatar
                            :color="`${theme} lighten-3`"
                            tile
                            height="92"
                        >
                            <v-icon :color="theme" large>history_edu</v-icon>
                        </v-avatar>

                        <v-card-text>
                            <div class="caption text-uppercase text-right text-truncate">total dosen</div>
                            <div class="text-h4 text-right">{{ totalCount }}</div>
                        </v-card-text>
                    </v-card>
                </v-col>

                <v-col cols="2" v-for="(statistic, index) in positions" :key="index">
                    <v-card rounded="lg" flat class="d-flex overflow-hidden">
                        <v-avatar
                            :color="`${theme} lighten-3`"
                            tile
                            height="92"
                        >
                            <v-icon :color="theme" large>school</v-icon>
                        </v-avatar>

                        <v-card-text>
                            <div class="caption text-uppercase text-right text-truncate">{{ statistic.name }}</div>
                            <div class="text-h4 text-right">{{ statistic.count }}</div>
                        </v-card-text>
                    </v-card>
                </v-col>

                <v-col cols="3">
                    <v-card rounded="lg" flat class="d-flex overflow-hidden">
                        <v-avatar
                            :color="`${theme} lighten-3`"
                            tile
                            height="92"
                        >
                            <v-icon :color="theme" large>history_edu</v-icon>
                        </v-avatar>

                        <v-card-text>
                            <div class="caption text-uppercase text-right text-truncate">pendidikan S2</div>
                            <div class="text-h4 text-right">{{ education_s2 }}</div>
                        </v-card-text>
                    </v-card>
                </v-col>

                <v-col cols="3">
                    <v-card rounded="lg" flat class="d-flex overflow-hidden">
                        <v-avatar
                            :color="`${theme} lighten-3`"
                            tile
                            height="92"
                        >
                            <v-icon :color="theme" large>history_edu</v-icon>
                        </v-avatar>

                        <v-card-text>
                            <div class="caption text-uppercase text-right text-truncate">pendidikan S3</div>
                            <div class="text-h4 text-right">{{ education_s3 }}</div>
                        </v-card-text>
                    </v-card>
                </v-col>
            </v-row>
        </template>
    </page-home>
</template>

<script>
export default {
    computed: {
        totalCount() {
            return this.positions.reduce((count, statistic) => {
                return count + statistic.count;
            }, 0);
        }
    },

    data:() => ({
        positions: [],
        education_s2: 0,
        education_s3: 0,
    }),

    methods: {
        openFaculty() {
            this.$router.push({ name: 'system-faculty' });
        },

        openLecture() {
            this.$router.push({ name: 'system-lecture' });
        },

        openPosition() {
            this.$router.push({ name: 'system-position' });
        },

        openScholarship() {
            this.$router.push({ name: 'system-scholarship' });
        },

        openUser() {
            this.$router.push({ name: 'system-user' });
        },

        fetchDashboardInfo({ positions, education_s2, education_s3 }) {
            this.positions = positions;
            this.education_s2 = education_s2;
            this.education_s3 = education_s3;
        }
    }
}
</script>