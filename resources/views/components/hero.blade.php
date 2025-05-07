@props(['weather_trend'])

<div
  class="w-full max-w-screen-lg mx-auto rounded-2xl overflow-hidden mb-8 shadow-xl/30 relative h-[350px] flex flex-col items-center justify-center">
  <div class="absolute inset-0 bg-gradient-to-b to-emerald-500/40 from-black/60 z-20"></div>

  <h2 class="text-5xl mb-2 mt-16 font-extrabold text-white z-30">Leiderdorp</h2>
  <section class="w-fit mx-auto text-white/80 z-30">
    <x-weather-trend :weather_trend="$weather_trend" />
  </section>
  <img
    src="https://scontent-ams2-1.xx.fbcdn.net/v/t39.30808-6/480694007_1032054612302174_4072837477115034999_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=cc71e4&_nc_ohc=7TDYAHgT6i4Q7kNvwE-eBrr&_nc_oc=AdkyGhEXydadz-uJ9gLb8f61DPCxxFatPaUXkW44HNvKh_1pAK3RlQm6WO9o_KyAdurtgW8GL7VxD8JDgbByBKGi&_nc_zt=23&_nc_ht=scontent-ams2-1.xx&_nc_gid=U-yFOZ6rSqDwMMsHHenPsw&oh=00_AfFXSGaKVOnPVhDSykt0deKf6FCIa-V4VrlhiHm_Vofjng&oe=681DAE97"
    alt="Gemeente Leiderdorp" class="absolute inset-0 w-full h-full object-cover object-center z-10">
</div>
