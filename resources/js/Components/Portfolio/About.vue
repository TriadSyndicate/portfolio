<template>
<div
    class="h-screen flex relative flex-col text-center md:text-left md:flex-row max-w-7xl px-10 justify-evenly mx-auto items-center">
    <h3 class="absolute top-20 uppercase tracking-[22px] text-gray-500 text-lg sm:text-3xl animate-pulse">
      About
    </h3>
    <kinesis-container event="scroll">
      <kinesis-element type="translate" :strength="150"
        class="mb-0 mt-10 sm:-mb-20 md:mb-0 flex-shrink-0 w-[128px] h-[128px] sm:w-28 sm:h-28  rounded-full object-cover md:rounded-lg md:w-64 md:h-56 xl:w-[500px] xl:h-[600px] ease-in hover:scale-150 motion-safe:ease-in-out duration-500">
        <img src="@/assets/Cid.png"
          class="mb-0 mt-10 sm:-mb-20 md:mb-0 flex-shrink-0 w-[128px] h-[128px] sm:w-28 rounded-full object-cover md:rounded-lg md:w-64 md:h-56 xl:w-[500px] xl:h-[600px] ease-in hover:scale-150 motion-safe:ease-in-out duration-500" />
      </kinesis-element>
    </kinesis-container>
    <div class="space-y-10 px-0 md:px-10">
      <h4 class="text-2xl md:text-4xl font-semibold">
        Here is a
        <span class="underline text-lg sm:text-3xl decoration-green-500">little</span>
        background
      </h4>
      <p class="text-base sm:text-lg">
        I am a Fullstack Developer with 5+ years of experience working
        in software development. Skilled in Node.js, PHP, JavaScript,
        Python, Vue.js, React, and Laravel. A Great team player, open to
        learning new technologies. Very flexible and with great
        communication skills⚡.
      <ul class="list-none">
        <li> Passionate about Code ./👨🏽‍💻 </li>
        <li>Fan of esports 🎮</li>
      </ul>
      </p>
    </div>
  </div>
</template>
<script>
import { KinesisContainer, KinesisElement } from "vue-kinesis";
export default {
  components: { KinesisContainer, KinesisElement },
};
</script>
<style lang=""></style>
