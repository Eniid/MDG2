<template>
    <card class="flex flex-col welcom">
        <div class="px-3 py-3" style="text-aline='left'">
            <h1 class="text-3xl text-80 font-light">Bienvenu :) </h1>
            <p>Bienvenu sur votre paneau d'administration! C'est ici que tout se passe! </p>
            <p>Vous pouvez naviguer entre les différents données via le menu latérale. Modifier le contenu, crée de nouvelles édition,... A vous de jouer!</p>     <br>
            <p>.</p>  
        </div>
    </card>
</template>

<script>
export default {
    props: [
        'card',

        // The following props are only available on resource detail cards...
        // 'resource',
        // 'resourceId',
        // 'resourceName',
    ],

    mounted() {
        //
    },
}
</script>
