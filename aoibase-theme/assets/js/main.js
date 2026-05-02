(function(){
  // Nav shadow on scroll
  var nav=document.getElementById('site-nav');
  if(nav){
    window.addEventListener('scroll',function(){nav.classList.toggle('scrolled',window.scrollY>10);},{passive:true});
  }

  // Mobile menu toggle
  var toggle=document.getElementById('nav-toggle'),menu=document.getElementById('mobile-menu');
  if(toggle&&menu){
    toggle.addEventListener('click',function(){menu.classList.toggle('hidden');});
    menu.querySelectorAll('a').forEach(function(l){l.addEventListener('click',function(){menu.classList.add('hidden');});});
  }

  // Hero slider
  var slides=Array.from(document.querySelectorAll('.hero-slide')),dots=Array.from(document.querySelectorAll('.hero-dot')),counter=document.getElementById('hero-current'),cur=0,total=slides.length,timer;
  function pad(n){return n<10?'0'+n:String(n);}
  function goTo(i){
    slides[cur].classList.remove('opacity-100');slides[cur].classList.add('opacity-0');
    dots[cur].classList.remove('active');
    cur=(i+total)%total;
    slides[cur].classList.remove('opacity-0');slides[cur].classList.add('opacity-100');
    dots[cur].classList.add('active');if(counter)counter.textContent=pad(cur+1);
  }
  if(slides.length){
    slides[0].classList.add('opacity-100');dots[0].classList.add('active');
  }
  function startAuto(){if(slides.length>1&&!window.matchMedia('(prefers-reduced-motion:reduce)').matches)timer=setInterval(function(){goTo(cur+1);},5000);}
  function resetAuto(){clearInterval(timer);startAuto();}
  dots.forEach(function(d){d.addEventListener('click',function(){goTo(parseInt(d.dataset.target));resetAuto();});});
  var sx=0,hero=document.getElementById('hero');
  if(hero){
    hero.addEventListener('touchstart',function(e){sx=e.touches[0].clientX;},{passive:true});
    hero.addEventListener('touchend',function(e){var dx=e.changedTouches[0].clientX-sx;if(Math.abs(dx)<40)return;goTo(dx<0?cur+1:cur-1);resetAuto();},{passive:true});
  }
  startAuto();

  // News ticker pause on hover
  var ticker=document.getElementById('news-ticker');
  if(ticker){
    ticker.addEventListener('mouseenter',function(){ticker.style.animationPlayState='paused';});
    ticker.addEventListener('mouseleave',function(){ticker.style.animationPlayState='running';});
  }

  // Page top button visibility
  var topBtn=document.getElementById('page-top-btn');
  if(topBtn){
    window.addEventListener('scroll',function(){
      if(window.scrollY>400){topBtn.classList.remove('opacity-0','translate-y-4','pointer-events-none');topBtn.classList.add('opacity-100','translate-y-0');}
      else{topBtn.classList.add('opacity-0','translate-y-4','pointer-events-none');topBtn.classList.remove('opacity-100','translate-y-0');}
    },{passive:true});
  }

  // Works filter tabs
  var tabs=document.querySelectorAll('.works-tab'),cards=document.querySelectorAll('#works-grid .works-card');
  tabs.forEach(function(t){t.addEventListener('click',function(){
    tabs.forEach(function(x){x.classList.remove('bg-[#0369A1]','text-white','border-[#0369A1]');x.classList.add('bg-white','text-[#475569]','border-[#CBD5E1]');});
    t.classList.remove('bg-white','text-[#475569]','border-[#CBD5E1]');t.classList.add('bg-[#0369A1]','text-white','border-[#0369A1]');
    var f=t.dataset.filter;
    cards.forEach(function(c){c.style.display=(f==='all'||c.dataset.category===f)?'':'none';});
  });});

  // Service track: clone cards for seamless loop
  var serviceTrack = document.querySelector('.service-track');
  if (serviceTrack) {
    var serviceCards = serviceTrack.querySelectorAll('.service-card');
    serviceCards.forEach(function(card) {
      var clone = card.cloneNode(true);
      clone.setAttribute('aria-hidden', 'true');
      serviceTrack.appendChild(clone);
    });
  }

  // Flow track: clone cards for seamless loop
  var flowTrack = document.querySelector('.flow-track');
  if (flowTrack) {
    var flowCards = flowTrack.querySelectorAll('.flow-item');
    flowCards.forEach(function(card) {
      var clone = card.cloneNode(true);
      clone.setAttribute('aria-hidden', 'true');
      flowTrack.appendChild(clone);
    });
  }

  // Side CTA hide near footer
  var sideCta=document.getElementById('side-cta'),footer=document.querySelector('footer');
  if(sideCta&&footer){sideCta.style.transition='opacity 200ms';window.addEventListener('scroll',function(){
    sideCta.style.opacity=footer.getBoundingClientRect().top<window.innerHeight?'0':'1';
    sideCta.style.pointerEvents=footer.getBoundingClientRect().top<window.innerHeight?'none':'';
  },{passive:true});}

  // Smooth scroll for anchor links
  document.querySelectorAll('a[href^="#"]').forEach(function(a){a.addEventListener('click',function(e){
    var t=document.querySelector(this.getAttribute('href'));if(t){e.preventDefault();var off=nav?nav.offsetHeight:0;window.scrollTo({top:t.getBoundingClientRect().top+window.scrollY-off,behavior:'smooth'});}
  });});
})();

// Achievement detail modal
function openDetailModal(type) {
  var titles = { challenge: '課題', solution: '解決策', outcome: '成果' };
  var dataEl = document.getElementById('detail-data-' + type);
  var modal = document.getElementById('detail-modal');
  if (!dataEl || !modal) return;
  document.getElementById('modal-title').textContent = titles[type] || '';
  document.getElementById('modal-content').innerHTML = dataEl.innerHTML;
  modal.classList.remove('hidden');
  document.body.style.overflow = 'hidden';
}

function closeDetailModal() {
  var modal = document.getElementById('detail-modal');
  if (modal) modal.classList.add('hidden');
  document.body.style.overflow = '';
}

// Scroll-triggered fade-in
(function(){
  if (!('IntersectionObserver' in window)) return;
  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

  var io = new IntersectionObserver(function(entries){
    entries.forEach(function(entry){
      if (entry.isIntersecting) {
        entry.target.classList.add('aoibase-fade-in-visible');
        io.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -50px 0px' });

  // 自動でセクション・カードを target にする
  var targets = document.querySelectorAll('section, .works-card, .service-card, .related-card, .pickup-card-shadow, .feature-grid, dl, article');
  targets.forEach(function(el){
    el.classList.add('aoibase-fade-in');
    io.observe(el);
  });
})();
