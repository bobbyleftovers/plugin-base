<script>
    import axios from 'axios';
    // import usmap from './MapData/StateData';
    // import MapWindowMain from './MapWindow/MapWindowMain';
    // import MobileViewer from './MobileViewer/MobileViewer';

    export default {
        
        beforeMount() {
            // set up the data
            console.log('call rest api')
            axios.get('bd-api/v1/profile').then( res => {
                console.log(res)
            })
        },

        components: {
            // MapWindowMain,
            // MobileViewer
        },

        data() {
            return {
                // mapLoading: true,
                // dataLoading: true
            }
        },

        methods: {

            // init
            init: function(){
                // axios.get('/wp-json/wp/v2/map/' + this.mapID)
                    // .then(res => {
                    //     console.log('INIT:',res.data);
                    //     // setup using the post meta
                    //     this.showDC = res.data.map_meta.show_dc;
                    //     this.showSmallStateIcons = res.data.map_meta.show_small_state_icons;
                    //     this.isCSV = res.data.map_meta.has_csv;
                    //     this.csvURL = res.data.map_meta.map_csv;
                    //     this.mapStyle = res.data.map_meta.style.map;
                    //     this.windowStyle = res.data.map_meta.style.dataViewer;
                    //     this.mapData = res.data.map_meta;

                    //     console.log('style',this.mapStyle,this.windowStyle)

                    //     // get state data from the right source based on the rest reponse
                    //     if(this.isCSV){
                    //         // set up csv data for use
                    //         this.setupCSV()
                    //             .then(
                    //                 (res) => {
                    //                     this.stateData = res;
                    //                 }
                    //             );
                    //     } else {
                    //         // or just grab the array from here
                    //         this.stateData = res.data.map_meta.states_array;
                    //     }

                    //     // build the map
                    //     this.setupMap()

                    // })
                    // .catch(error => {
                    //     // get error handling code
                    // }) 
            }

        }
    };
</script>
<template>
    <div>
        <div>
            <span>Loading data...</span>
        </div>
        <div class="directory-wrapper">
            <div id="data-box">
            </div>
        </div>
    </div>
</template>
<style>
</style>