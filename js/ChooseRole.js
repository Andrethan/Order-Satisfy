var toArray = function(nodes) {
  return Array.prototype.slice.call(nodes);
},

ACTIVE_CSS_SELECTOR = 'active',

tabSwitchers = toArray(document.querySelectorAll('button[data-tab]')),

activateTab = function(name) {
  var tabs = toArray(document.querySelectorAll('.tab[data-tab]'));

  tabs.forEach(function(tab) {
    tab.dataset.tab === name ?
      tab.classList.add(ACTIVE_CSS_SELECTOR) : tab.classList.remove(ACTIVE_CSS_SELECTOR);
  });
},

tabSwitchClickHandler = function(event) {
  activateTab(event.target.dataset.tab);
};

tabSwitchers.forEach(function(button) {
button.onclick = tabSwitchClickHandler;
});