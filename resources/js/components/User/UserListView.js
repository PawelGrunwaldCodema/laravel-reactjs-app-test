import React, { useState, useEffect } from 'react';

function UserListView() {
    const [roles, setRoles] = useState([]);
    const [users, setUsers] = useState([]);
    const [filters, setFilters] = useState({roles: []});

    useEffect(() => {
        handleFetchUsers();
        handleFetchRoles();
    }, []);

    const handleFetchUsers = (query = '?') => {
        axios.get("/api/user/get" + query)
            .then(({data}) => {
                setUsers(data.users);
            });
    };

    const handleFetchRoles = () => {
        axios.get('/api/role/get')
            .then(({data}) => {
                const roles = data.roles;
                setRoles(roles);
            });
    };

    const handleOnChangeRole = (event) => {
        let value = Array.from(
            event.target.selectedOptions,
            (option) => option.value,
        )

        setFilters(prevState => ({
            ...prevState,
            roles: value,
        }))
    }

    const onFilterChange = () => {
        let query = '?';

        filters.roles.map((role, index) => {
            query += 'roles[]=' + role;
            query += filters.roles.length === index + 1 ? '' : '&';
        });

        handleFetchUsers(query);
    };

    return (
        <div>
            <div>
                <h4>Filters</h4>
                <div className="filters form-row pb-2">
                    <div className="col-1">
                        <label htmlFor="input__roles">Roles</label>
                    </div>
                    <div className="col-6">
                        <select
                            multiple
                            name="roles"
                            className="form-control"
                            id="input__roles"
                            style={{textTransform: 'capitalize'}}
                            size="2"
                            onChange={handleOnChangeRole}
                            value={filters.roles}
                        >
                            {
                                roles
                                    .map(role => {
                                        return <option key={role.id} value={role.name}>{role.name}</option>
                                    })
                            }
                        </select>
                    </div>
                </div>
                <div className="form-row pb-2">
                    <div className="col text-right">
                        <button type="submit" className="btn btn-outline-info" onClick={onFilterChange}>Filter</button>
                    </div>
                </div>
            </div>
            <table className="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Full name</th>
                    <th scope="col">Email Address</th>
                    <th scope="col">Roles</th>
                </tr>
                </thead>
                <tbody>
                {
                    users
                        .map((user, index) => {
                            let rolesAsString = '';

                            user.roles.map((role, index) => {
                                rolesAsString += role.name
                                rolesAsString += user.roles.length === index + 1 ? '' : ', ';
                            })

                            return (
                                <tr key={user.id}>
                                    <th scope="row">{index + 1}</th>
                                    <td>{user.full_name}</td>
                                    <td>{user.email}</td>
                                    <td>{rolesAsString}</td>
                                </tr>
                            );
                        })
                }
                </tbody>
            </table>
        </div>
    );
}

export default UserListView;
