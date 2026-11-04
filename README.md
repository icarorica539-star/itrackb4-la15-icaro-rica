# ITRACKB4 Laboratory Activity 10

# H1. The top of your error page named a file inside vendor. Say why that was not where your mistake was, and where the page showed you it actually was.




The vendor file was not where my mistake was because it contained Laravel's framework code, not my own application code. The error page showed that the actual mistake was in app/Http/Controllers/SubjectController.php, specifically on the line where I accidentally added an extra letter to the with() method.


# H2. You wrote one Log::info line with a context array. Name something it will tell you next month that the error page could not.


The context array in Log::info() will tell me the specific subject ID that was saved. This helps me identify which record was involved in an operation next month, even when the original error page is no longer available.


#  H3. Your guard answers with 403 instead of redirecting back with a message. Say when each of the two is the better answer.



A 403 error is better when the user attempts an action that is not allowed, such as deleting a subject that is still required by another subject. Redirecting back with a message is better when the action is valid but cannot be completed, and the user can correct the issue or try again.