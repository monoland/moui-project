<template>
    <page-data
        parent="system-dashboard"
        slug="recap"
        title="Rekap"
    >
        <template v-slot:toolbar_default="{ store }">
            <moui-button
                icon="download"
                tooltip="Download Data"
                @click="download(store)"
            ></moui-button>

            <moui-button
                icon="cloud_sync"
                tooltip="Rekap Data"
                @click="recaps(store)"
            ></moui-button>
        </template>

        <moui-table></moui-table>
    </page-data>
</template>

<script>
export default {
    methods: {
        download(store) {
            store.$http(store.dataURL + '/download', {
                method: 'GET',
                params: store.pageFilters.length > 0 ? 
                    { ...store.pageParams, filters: store.pageFilters } : 
                    store.pageParams,
                responseType: 'blob',
            })
            .then((blob) => {
                var fileURL = window.URL.createObjectURL(blob);
                var fileLink = document.createElement('a');
            
                fileLink.href = fileURL;
                fileLink.setAttribute('download', 'rekap-' + new Date() + '.xlsx');
                document.body.appendChild(fileLink);
            
                fileLink.click();
            })
        },

        recaps(store) {
            store.$http(store.dataURL + '/sync-recap', {
                method: 'POST',
                params: store.pageFilters.length > 0 ? 
                    { ...store.pageParams, filters: store.pageFilters } : 
                    store.pageParams,
            });
        }
    }
}
</script>