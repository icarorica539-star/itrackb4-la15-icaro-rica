# ITRACKB4 Laboratory Activity 10

# 1.Your project answered one question last week and a second one this week. Name both questions, say which one your policy answers, and point at the file that answers the other.


Last week our project was answering the question "is the user signed in?” This week it's answering "what is the signed in user allowed to do?” The SubjectPolicy.php file is the one that answers the authorisation question and routes/web.php is where the auth middleware is applied to protect the routes that require a signed in user.

# 2.role is not in your User model's $fillable, and yet you set it and saved it in Tinker. Explain why both of those are true, and say what $fillable is actually guarding you against.

The role column isn't in my User model's $fillable array, yet I was able to set and save it in Tinker via direct property assignment and then a save(). The $fillable array is there to protect the app from mass assignment, so that users can't go around and change things like the role via mass assignment.

# 3.A signed-in non-admin typing your create address gets a 403. A guest typing the same address gets your login page. Say which layer produced each response, and why the two are deliberately different.

When a signed in non-admin visits /subjects/create the auth layer (via SubjectPolicy) will deny access and return a 403 Forbidden. A guest visiting that same URL will be redirected to the login page by the auth middleware as they're not signed in. The responses are different on purpose as the auth checks for identity and the authorisation checks for permission.

# 4.Your list and detail pages are still open to everybody, and your policy says so. Explain why that is a decision and not something you forgot.

Our subjects.index and subjects.show routes are both still open to the public as our SubjectPolicy permits users to view the subject list and individual subject records. That's on purpose really as we want visitors and students to be able to see the subject information, whilst only administrators should be able to create, edit or delete subjects.

# 5.The same rule is read by your controller and by your list page. What would go wrong if you had written that role check in both places by hand instead of in a policy?

My controller uses SubjectPolicy to authorise the actions and my resources/views/subjects/index.blade.php uses @can to control the visibility of the Add Subject, Edit and Delete options. If you were to manually replicate the role checks in both places then you could end up with inconsistent rules when the rules are subsequently updated, with an action being available in one place and the wrong controls being shown or hidden in another.

# 6.What does SESSION_LIFETIME count, what does it not count, and why was there no warning before you found yourself logged out?

SESSION_LIFETIME=120 - this is 120 minutes of session inactivity (not the total time the user has been signed in). User activity will reset the inactivity period and Laravel doesn't automatically show a warning or countdown at all as my project doesn't have a client side session warning implemented.