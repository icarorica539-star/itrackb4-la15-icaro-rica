# ITRACKB4 Laboratory Activity 10

# F1. Authentication and authorisation are not the same. In one sentence each: what did this lesson give you, and what is still missing next meeting?

Authentication helps identify the user, and authorisation checks what that user is allowed to access. The lesson has shown me how to do registration, log in, log out, and protect the routes. At the next class, I still have to figure out how to manage user permissions.



# F2. Why does a successful login call session()->regenerate()? What goes wrong if you skip it?

The usage of session()->regenerate() generates a new session ID when logging in and thus protects against session fixation attacks. Otherwise, an attacker could use the existing session ID to log into the user's account.


# F3. Why does a failed login use the same message for a wrong password and an unknown email?

Only one message stops the attackers from understanding whether an email is registered in the system or not.


# F4. Why do index and show stay public while create/edit/update/destroy use auth?

Index and show routes remain public for everybody to see the list and info of the subjects, whereas other actions (create, edit, update, destroy) should be available for authenticated users only.

# F5. You hid Add (and actions) for guests. Why is that not enough to secure those actions? What actually stops a stranger?

To hide Add, Edit, and Destroy buttons will not solve the problem. The auth middleware is responsible for blocking guests from reaching protected routes.

# F6. In screenshot 20 the route name was wrong. Why does auth middleware care that the route is named exactly login?

Middleware auth redirects unauthenticated guests using the route name login to this route. However, if the route has another name, Laravel will not find it and display an error Route [login] not defined.