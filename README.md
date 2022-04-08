This is the customer-facing website for our CRM project. It should allow users to create an account, log in, and place an order. Contact Josh if you have questions.

# Configuration

## Local Development

You can just follow these steps and push to Github if you don't want to do the FTP stuff.

1. Download [XAMPP](https://www.apachefriends.org/index.html)
2. Clone this repo into xampp/htdocs/crm directory.
3. Start the xampp server and go to localhost:`port`/crm
    * replace `port` with the correct port number
4. You should see the website.

## Pushing to our server via FTP

Once you develop and test something locally, you can push it to our server to make sure it works there. Push to the server from the master branch. If you want to push a different branch then make a subdomain on cPanel and replace `./dev` with `./your-subdomain` in `ftp-sync.json`.

1. Download extension "ftp-sync" in VSCode.
2. Copy the file `.vscode/ftp-sync.json.template`, remove `.template` from the filename of the copy and put your cPanel FTP username and password in the `username` and `password` fields.
    * Go to `FTP Accounts` in cPanel (`Files` section)
3. Open the command pallete (`ctrl` + `shift` + `p`) and enter `ftp-sync: Local to Remote`.
4. Select the folder you want to push to the server (usually `.`)
5. Selet `safe-sync`
6. Select `run`, or select `review` then enter `ftp-sync: commit` after reviewing changes.
6. Open the command pallete (`ctrl` + `shift` + `p`) and type "ftp-sync" to see all available commands.

### Extension documentation

https://marketplace.visualstudio.com/items?itemName=lukasz-wronski.ftp-sync
