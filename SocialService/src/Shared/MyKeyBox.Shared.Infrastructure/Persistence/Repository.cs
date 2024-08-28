using System.Runtime.CompilerServices;
using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.ChangeTracking;
using MyKeyBox.Shared.Abstractions.Common;

[assembly:InternalsVisibleTo("MyKeyBox.Modules.BackOffice.Core")]

namespace MyKeyBox.Shared.Infrastructure.Persistence;

internal abstract class Repository<T, TDbContext> 
    where TDbContext : DbContext
    where T : Entity
{
    protected readonly TDbContext DbContext;

    protected Repository(TDbContext dbContext)
        => DbContext = dbContext;

    public async Task<T?> GetByIdAsync(int id,CancellationToken token= default)
        => await DbContext
            .Set<T>()
            .SingleOrDefaultAsync(x=>x.Id==id,token);


    public async Task<List<T>> GetAllAsync()
        =>await DbContext.Set<T>().ToListAsync();

    public async Task<bool> ExistById(int id) 
        => await DbContext.Set<T>().AnyAsync(x => x.Id == id);
    
    public async Task<EntityEntry<T>> AddAsync(T entity)
        =>await DbContext.AddAsync(entity);

    public async Task<EntityEntry<T>> UpdateAsync(T type) 
        =>  DbContext.Set<T>().Update(type);
    
    public async Task<EntityEntry<T>> Delete(T type) 
        =>  DbContext.Set<T>().Remove(type);
}