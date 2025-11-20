import Alpine from 'alpinejs'
import AOS from 'aos'
import Prism from 'prismjs'
import 'aos/dist/aos.css'
import 'prismjs/themes/prism-tomorrow.css'

// bahasa tambahan
import 'prismjs/components/prism-markup'
import 'prismjs/components/prism-clike'
import 'prismjs/components/prism-php'
import 'prismjs/components/prism-javascript'
import 'prismjs/components/prism-css'
import 'prismjs/components/prism-sql'


window.Alpine = Alpine

Alpine.start()

document.addEventListener('DOMContentLoaded', () => {
    AOS.init({
        duration: 900,      // durasi animasi (ms)
        once: true,         // hanya animasi sekali
        offset: 80,         // jarak sebelum muncul
        easing: 'ease-out', // jenis efek transisi
    })
})

document.addEventListener("DOMContentLoaded", () => {

    const track = document.getElementById("portfolio-track");
    const items = [...track.children];

    // Gandakan item untuk infinite effect
    items.forEach(item => {
        const clone = item.cloneNode(true);
        track.appendChild(clone);
    });

    let position = 0;
    let step = items[0].offsetWidth + 24; // 24 = gap-6

    function slide() {
        position += step;

        // Jika sudah melewati setengah track (karena kita duplikasi)
        if (position >= track.scrollWidth / 2) {
            position = 0; // reset halus, tidak terlihat
            track.style.transition = "none";
            track.style.transform = `translateX(0px)`;

            // Timer kecil agar transition aktif lagi
            setTimeout(() => {
                track.style.transition = "transform 0.7s ease-in-out";
            }, 50);

            return;
        }

        track.style.transform = `translateX(-${position}px)`;
    }

    // Aktifkan slide auto
    setInterval(slide, 2500);
});

document.addEventListener("DOMContentLoaded", () => {
  const track = document.getElementById("testimoni-track");
  const items = [...track.children];

  // Gandakan item agar slider bisa looping
  items.forEach(item => {
    const clone = item.cloneNode(true);
    track.appendChild(clone);
  });

  let position = 0;
  let step = items[0].offsetWidth + 24; // 24px karena gap-6

  function slide() {
    position += step;
    if (position >= track.scrollWidth / 2) {
      position = 0;
      track.style.transition = "none";
      track.style.transform = "translateX(0px)";
      setTimeout(() => {
        track.style.transition = "transform 0.7s ease-in-out";
      }, 50);
      return;
    }
    track.style.transform = `translateX(-${position}px)`;
  }

  setInterval(slide, 2500);
});

// --- tambahkan ini di paling bawah ---
document.addEventListener('DOMContentLoaded', () => {
    Prism.highlightAll();
});

