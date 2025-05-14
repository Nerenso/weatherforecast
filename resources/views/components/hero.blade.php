@props(['weather_trend'])

<div
  class="w-full max-w-screen-lg mx-auto rounded-2xl overflow-hidden mb-8 shadow-xl/30 relative h-[350px] flex flex-col items-center justify-center">
  <div class="absolute inset-0 bg-gradient-to-b to-emerald-500/40 from-black/60 z-20"></div>

  <h2 class="text-5xl mb-2 mt-16 font-extrabold text-white z-30">Leiderdorp</h2>
  <section class="w-fit mx-auto text-white/80 z-30">
    <x-weather-trend :weather_trend="$weather_trend" />
  </section>
  <img src={{ url('img/leiderdorp.jpg') }} alt="Gemeente Leiderdorp"
    class="absolute inset-0 w-full h-full object-cover object-center z-10">
</div>
