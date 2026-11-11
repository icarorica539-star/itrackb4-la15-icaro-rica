# ITRACKB4 Laboratory Activity 10

# J1. Your HomeController is not a resource controller. Name two things an index() on a resource controller does that yours does not have to.

A resource controller's index() usually retrieves and displays a list of records from a database. My HomeController does not need to retrieve and display all subject records. Instead, it only gets the total number of subjects and prerequisites and displays them on the home page.


# J2. Your pagination links lost the search term until you added one method. Say what those links contained before, and what the controller therefore received.

Before adding withQueryString(), the pagination links contained only the page number, such as ?page=2. The controller therefore received the page number but did not receive the previous search term or filters. Adding withQueryString() preserves the existing query parameters when navigating between pages.


# J3. A misspelled sort value does not break your page. Explain why that is worse than an error, and what your allowed list does about it.

A misspelled sort value is worse because it can silently produce an incorrectly ordered list without showing an error. My allowed list checks whether the requested sort column is either code or title. If the value is invalid, it falls back to the default id column to keep the page working safely.