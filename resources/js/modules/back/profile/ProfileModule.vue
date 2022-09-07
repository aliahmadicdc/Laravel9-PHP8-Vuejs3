<template>
    <div class="d-flex flex-row">

        <ProfileAside/>

        <router-view />

    </div>
</template>

<script>
import PersonalInformation from "./components/PersonalInformation"
import ProfileAside from "./components/base/ProfileAside"

export default {
    name: "ProfileModule",
    components: {ProfileAside, PersonalInformation}
}
</script>
