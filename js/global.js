/* No JS required any more */

document.onkeydown = function (e) {
  switch (e.keyCode) {
    case 37:
        if (document.getElementById('previous_guideline') !== null)
                window.location = document.getElementById('previous_guideline').href;
        break;

    case 39:
        if (document.getElementById('next_guideline') !== null)
                window.location = document.getElementById('next_guideline').href;
        break;

    default:
        return; // Do nothing for the rest
  }
};
