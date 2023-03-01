import xmlrpc.client

url = "http://localhost:8069"
db = "automation03"
username = 'admin'
password = 'admin'

# info = xmlrpc.client.ServerProxy('https://demo.odoo.com/start').start()
# url, db, username, password = \
#     info['host'], info['database'], info['user'], info['password']

common = xmlrpc.client.ServerProxy('{}/xmlrpc/2/common'.format(url))
print(common.version())