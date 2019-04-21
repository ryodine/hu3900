import { onReady } from './on_ready';

import Glide from '@glidejs/glide';

onReady(() => {
  // Setup homepage hero carousel
  if (document.querySelectorAll('.glide').length != 0) {
    new Glide('.glide', {
      type: 'carousel',
      gap: 0,
      autoplay: 8000,
      hoverpause: true
    }).mount();
  }
})