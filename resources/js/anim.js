import { animate, inView, stagger } from "motion";

const easeOut = [0.22, 1, 0.36, 1];

function prime(el, type) {
  switch (type) {
    case "fade-up":
      el.style.opacity = 0; el.style.transform = "translateY(24px)";
      break;
    case "fade-in":
      el.style.opacity = 0; el.style.transform = "scale(.98)";
      break;
    case "slide-left":
      el.style.opacity = 0; el.style.transform = "translateX(24px)";
      break;
    case "slide-right":
      el.style.opacity = 0; el.style.transform = "translateX(-24px)";
      break;
    case "kenburns":
      el.style.willChange = "transform";
      break;
    default:
      el.style.opacity = 0;
  }
}

function run(el, type, delay = 0) {
  switch (type) {
    case "fade-up":
      return animate(el, { opacity: 1, y: 0 }, { duration: 0.6, easing: easeOut, delay });
    case "fade-in":
      return animate(el, { opacity: 1, scale: 1 }, { duration: 0.5, easing: "ease-out", delay });
    case "slide-left":
      return animate(el, { opacity: 1, x: 0 }, { duration: 0.6, easing: easeOut, delay });
    case "slide-right":
      return animate(el, { opacity: 1, x: 0 }, { duration: 0.6, easing: easeOut, delay });
    default:
      return animate(el, { opacity: 1, y: 0 }, { duration: 0.6, easing: easeOut, delay });
  }
}

function onView(el) {
  const type = el.dataset.anim ?? "fade-up";
  const delay = Number(el.dataset.delay || 0);
  prime(el, type);

  inView(el, () => {
    run(el, type, delay);
  }, { margin: "-8% 0px" });
}

function onStagger(container) {
  const childSelector = container.dataset.staggerChildren || "[data-anim]";
  const delayChildren = Number(container.dataset.delayChildren || 0.0);
  const step = Number(container.dataset.stagger || 0.12);
  const type = container.dataset.staggerType || "fade-up";

  const kids = Array.from(container.querySelectorAll(childSelector));
  kids.forEach(k => prime(k, type));

  inView(container, () => {
    animate(
      kids,
      type.startsWith("slide-")
        ? (type === "slide-left" ? { opacity: 1, x: 0 } : { opacity: 1, x: 0 })
        : type === "fade-in"
          ? { opacity: 1, scale: 1 }
          : { opacity: 1, y: 0 },
      { duration: 0.6, easing: easeOut, delay: stagger(step, { start: delayChildren }) }
    );
  }, { margin: "-8% 0px" });
}

export function kenBurns(el) {
  animate(
    el,
    { scale: [1.04, 1], transformOrigin: "50% 50%" },
    { duration: 16, direction: "alternate", easing: "linear", repeat: Infinity }
  );
}

export function initAnimations() {
  const prefersReduced = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  if (prefersReduced) return;

  document.querySelectorAll("[data-anim]").forEach(onView);
  document.querySelectorAll("[data-stagger]").forEach(onStagger);

  document.querySelectorAll("[data-kenburns]").forEach(kenBurns);
}

document.addEventListener("DOMContentLoaded", initAnimations);
